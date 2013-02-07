## Remote LibLouis

## requires
require 'sinatra'
require 'json'

##User is trying to access an endpoint that isn't valid
not_found do

	##If the user tries to access an invalid endpoint, give them an error and return documentation link
	status 404
	"Not found; only POST is allowed. See documentation here: --INSERT DOCUMENTATION LINK HERE FOR PRODUCTION--"

end

##User is posting to the /braille endpoint
post '/braille' do

	##Create the input and output files for the system call
	input_file = Tempfile.new('braille')
	output_file = Tempfile.new('braille')
	
	"Input file created"
	
	##Write the message that the caller provided in the message param to the input_file var
	input_file.write("#{params[:message]}")
	
	"Input file written"
	
	begin 
		
		##Make the system call 
			system("xml2brl -p #{input_file.path} #{output_file.path}")
		
		"System call made"
		
		##Return the output file contents
			"#{output_file.read}"
	
	ensure
	
		##Close the files
		input_file.close
		output_file.close
	
		##Unlink the files
		input_file.unlink
		output_file.unlink
	
	end

end