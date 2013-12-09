<?php
/**
 * @package    filter
 * @subpackage braille
 * @copyright  2013 University of Maryland
 */
 
require_once('LibLouis-Remoter.php');

function ascii_to_unicode($text) {
  $base = 10240;
  $ascii2unicode = array(
    ' ' => 0,
    'a' => 1, 'b' => 3, 'c' => 9, 'd' => 25, 'e' => 17, 'f' => 11,
    'A' => 1, 'B' => 3, 'C' => 9, 'D' => 25, 'E' => 17, 'F' => 11,
    'g' => 27, 'h' => 19, 'i' => 10, 'j' => 26,
    'G' => 27, 'H' => 19, 'I' => 10, 'J' => 26,

    'k' => 5, 'l' => 7, 'm' => 13, 'n' => 29, 'o' => 21, 'p' => 15,
    'K' => 5, 'L' => 7, 'M' => 13, 'N' => 29, 'O' => 21, 'P' => 15,
    'q' => 31, 'r' => 23, 's' => 14, 't' => 30,
    'Q' => 31, 'R' => 23, 'S' => 14, 'T' => 30,

    'u' => 37, 'v' => 39, 'x' => 45, 'y' => 61, 'z' => 53,
    'U' => 37, 'V' => 39, 'X' => 45, 'Y' => 61, 'Z' => 53,
    '&' => 47, '=' => 63, '(' => 55, '!' => 46, ')' => 62,

    '*' => 33, '<' => 35, '%' => 41, '?' => 57, ':' => 49,
    '$' => 43, ']' => 59, '}' => 59, '\\' => 51, '{' => 42,
    'W' => 58, 'w' => 58,

    '1' => 2, '2' => 6, '3' => 18, '4' => 50, '5' => 34, '6' => 22,
    '7' => 54, '8' => 38, '9' => 20, '0' => 52,

    '/' => 12, '+' => 44, '#' => 60, '>' => 28, "'" => 4, '-' => 36,

    '@' => 8, '^' => 24,  '_' => 56, '"' => 16, '.' => 40, ';' => 48,
    ',' => 32,
    '|' => 51,
    '~' => 24,
  );
  $out = "";
  $n = strlen($text);
  for($i = 0; $i < $n; $i++) {
    $ch = $text[$i];
    if(array_key_exists($ch, $ascii2unicode)) {
      $out .= sprintf("&#%d;", $base + $ascii2unicode[$ch]);
    }
    else {
      $out .= $ch;
    }
  }
  return $out;
}

function filter_braille_convert_dots_to_unicode($dots) {
  $codes = array(
    '1' => 1,
    '2' => 2,
    '3' => 4,
    '4' => 8,
    '5' => 16,
    '6' => 32,
  );
  $n = strlen($dots);
  $code = 0;
  for($i = 0; $i < $n; $i++) {
    $ch = $dots[$i];
    if(array_key_exists($ch, $codes)) {
      $code += $codes[$ch];
    }
  }
  $unicode = 10240 + $code;
  return sprintf("&#%d;", $unicode);
}

function filter_braille_convert_dot_list_to_unicode($dot_list) {
  $bits = explode(" ", $dot_list[1]);
  $n = sizeof($bits);
  $ret = "";
  for($i = 0; $i < $n; $i++) {
    if($bits[$i] == "_") {
      $ret .= "&#10240;";
    }
    else {
      $ret .= filter_braille_convert_dots_to_unicode($bits[$i]);
    }
  }
  return "<span style='font-family: SimBraille, \"Segoe UI Symbol\"'>" . $ret . "</span>";
}

function filter_braille_convert_braille($content, $display_utf8) {
  global $CFG;

  $acontent = returnBrailleForString($content, $CFG->filter_braille_remote_url);
  if($display_utf8) {
    $bcontent = ascii_to_unicode($acontent);
  }
  else {
    $bcontent = htmlspecialchars($acontent);
  }
  return "<span style='font-family: SimBraille, \"Segoe UI Symbol\"'>" . $bcontent . "</span>";
}

function filter_braille_convert_simbraille($matches) {
  return filter_braille_convert_braille($matches[1], TRUE);
}

function filter_braille_convert_embbraille($matches) {
  return filter_braille_convert_braille($matches[1], FALSE);
}

class filter_braille extends moodle_text_filter {
  function filter($text, array $options = array()) {
    $text = preg_replace_callback('{\[SimBraille\](.*?)\[/SimBraille\]}', "filter_braille_convert_simbraille", $text);
    $text = preg_replace_callback('{\[EmbBraille\](.*?)\[/EmbBraille\]}', "filter_braille_convert_embbraille", $text);
    $text = preg_replace_callback('{\[BDots? (.*?)\]}', "filter_braille_convert_dot_list_to_unicode", $text);
    return $text;
  }
}
?>
