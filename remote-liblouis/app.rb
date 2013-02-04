## Remote LibLouis

## requires
require 'sinatra'
require 'json'

get '/' do

	"Only POST is allowed"
	
end

### BrailleObject
class BrailleObject
  property :plaintext, String, :required => true
  property :brailletext, String
  property :status, String
end

## ThingResource application
class RemoteLibLouis < Sinatra::Base