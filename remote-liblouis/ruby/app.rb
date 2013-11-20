## Remote LibLouis

## requires
require 'sinatra'
require 'json'
require 'tempfile'

##User is trying to access an endpoint that isn't valid
not_found do

	##If the user tries to access an invalid endpoint, give them an error and return documentation link
	status 404
	"Not found; only POST is allowed. See documentation here: https://github.com/corybohon/braille/tree/master/remote-liblouis"

end

##User is posting to the /braille endpoint
post '/braille' do
	
	##Create the input and output files for the system call
	input_file = Tempfile.new('braille')
	output_file = Tempfile.new('braille')
	
	##Write the message that the caller provided in the message param to the input_file var
	input_file.write("#{params[:content]}")
	
	##If the input file has content, then proceed with the translation 
	## otherwise, exit with status code 501 "You must specify content to convert to braille."
	if input_file.size > 0
	
		begin 
		
			##Make the system call 
			system("file2brl -p #{input_file.path} #{output_file.path}")
		
			##Check to make sure that the length of the output file is greater than 0; if not, then
			## exit with status 502 "Content not successfully converted to braille." 
	
			if output_file.size > 0
				
				##Return the output file contents
				"#{output_file.read}"
				
			else
			
				##Exit with status code 502
				status 502
				"Content not successfully converted to braille." 
				
			end
	
		ensure
	
			##Close the files
			input_file.close
			output_file.close
	
			##Unlink the files
			input_file.unlink
			output_file.unlink
			
		end
		
	else
		
		##Close the files
		input_file.close
		output_file.close
	
		##Unlink the files
		input_file.unlink
		output_file.unlink
		
		status 501
		"You must specify content to convert to braille."
			
	end

end

post '/braille.json' do

##Create the input and output files for the system call
	input_file = Tempfile.new('braille')
	output_file = Tempfile.new('braille')
	
	request.body.rewind  # in case someone already read it
 	 data = JSON.parse request.body.read
	
	##Write the message that the caller provided in the message param to the input_file var
	input_file.write("#{data['content']}")
	
	##If the input file has content, then proceed with the translation
	## otherwise, exit with the status code 501 "You must specify content to convert to braille."
	if input_file.size > 0
	
		begin
			
			##Make the system call
			system("file2brl -p #{input_file.path} #{output_file.path}")
			
			##Check to make sure that the length of the output file is great than 0; if not, then 
			## exit with a status 502 "Content not successfully converted to braille."
			
			if output_file.size > 0	
			
				## Return the output file contents
				outputInJSON = {'content' => "#{output_file.read}"}
				outputInJSON.to_json
			
			else 
			
				## Exit with status code 502
				status 502
				"Content not successfully converted to braille.".to_json
				
			end
			
		ensure
		
			##Close the files
			input_file.close
			output_file.close
			
			##Unlink the files
			input_file.unlink
			output_file.unlink
			
		end
	
	else
	
		##Close the files
		input_file.close
		output_file.close
			
		##Unlink the files
		input_file.unlink
		output_file.unlink
		
		status 501
		"You must specify content to conver to braille.".to_json
	
	end
		
end