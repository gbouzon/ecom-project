Feature: register
    In order to access the application's full functionality
    As a user
    I need to be able to register

    Scenario: try registering for an account
     Given I am on page "/User/register"
     When I enter "User" in "first_name" and "Test" in "last_name" and "test45@gmail.com" in "email" and "1234" in "password" and "password_confirm" and click "Register!"
     Then I am redirected to "/User/login"

    Scenario: try registering for an account with an email that already exists
     Given I am on page "/User/register"
     When I enter "User" in "first_name" and "Test" in "last_name" and "tarzan@gmail.com" in "email" and "1234" in "password" and "password_confirm" and click "Register!"
     Then I see "The user account with that email already exists"