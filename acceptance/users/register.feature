Feature: register
    In order to access the application's full functionality
    As a user
    I need to be able to register

    Scenario: try registering for an account
    Given I am on the application
    When I click on "Register" after filling the registration form
    Then I see "You have successfully registered"