Bracket Validator
This is a PHP-based web solution that validates whether a given string of brackets is valid or invalid. The program checks for the correct pairing of parentheses (), curly braces {}, and square brackets [] in the input string.

Features
Accepts an input string consisting of brackets.
Validates if the brackets are properly balanced and correctly paired.
Displays whether the input is Valid or Invalid.
Includes a user-friendly form for input submission and result display.
Installation and Usage
Prerequisites
A web server with PHP installed (e.g., XAMPP, WAMP, LAMP, etc.).
Steps to Run:
Download and place the files:

Save the PHP code in a file named index.php.
Run the server:

If you're using XAMPP, place the file in the htdocs directory.
Start your Apache server.
Access the application:

Open a web browser and go to http://localhost/index.php (or wherever you placed the file).
Input the bracket string:

Enter a string of brackets in the input field. For example: ()[]{}
Click on the Check Valid/In-Valid button.
See the result:

The application will display either Valid (if the input string is correctly paired) or Invalid (if the string has incorrect or unbalanced brackets).
Code Explanation
Class: Solution
The Solution class contains methods to check the validity of the brackets.

__construct():

Generates an HTML form with an input field for bracket strings and a submit button.
is_valid($s):

Checks if the input string has valid bracket pairs by calling check_count and check_positions methods.
check_count($arr):

Counts the opening and closing brackets to ensure they are balanced.
check_positions($arr):

Validates if the positions of the opening and closing brackets follow the correct order.
check_for_closing_postion():

Helper function that looks for matching closing brackets for each opening bracket.
Input Validation
The program ensures that the input string length is between 1 and 104 characters, which is a reasonable constraint to handle common cases of bracket string validation.

Styling
The HTML output is styled using embedded CSS to provide visual feedback (green for Valid, red for Invalid).

Examples
Valid Input:
()[]{}
{[()()]}
Invalid Input:
({[})]
([)]
License
This project is open-source and free to use. No specific license is applied.

