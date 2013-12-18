# Time Date - A Low Variables Type

Time Date is a Low Variables Type which provides a LowVars compatible jQuery UI time/date picker.

## Installation

 1. Copy `system/expressionengine/third_party/low_variables/types/time_date` folder into the low_variables types add-on folder.

 2. Copy `themes/third_party/low_variables/types/time_date` folder into the low_variables types theme folder. **You may need to create the types folder if it doesn't already exist.**

 3. Turn on the type in Low Variables extension settings under "Variables Types".
 
## Usage

#### Basic

`{my_var_name}` *(no parameters)*

#### Advanced w/ parameters

`{exp:low_variables:single var="my_var_name"}`

##### Parameters

 - [format](http://ellislab.com/expressionengine/user-guide/templates/date_variable_formatting.html)
 - localize - [ TRUE | FALSE | [string of PHP timezone](http://php.net/manual/en/timezones.php) ]
 

## Requirements

[Low Variables](http://gotolow.com/addons/low-variables)

jQuery for the Control Panel
 
## Credit


[@low](http://twitter.com/low)

[Timepicker](http://trentrichardson.com/examples/timepicker/) - Version 1.4.3 as of Time Date 1.1.0

## Notes/Todos
 - format should work fine though, needs testing on >= 2.6
 - localize param may or may not be working

 
## Changelog

 - 1.1 - Added format &amp; localize params and updated Timepicker
 - 1.0 - Initial Release


