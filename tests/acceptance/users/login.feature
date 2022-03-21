Feature: login
    In order to access functionality reserved to authenticated users
    As a person on the internet
    I need to be able to login

    Scenario: try logging in correctly
    Given I am on page "/User/login"
    When I enter "tarzan@gmail.com" in "email" and "jane" in "password" and click "Login!"
    Then I am redirected to "Store/index/10"

    Scenario: try logging in incorrectly
    Given I am on page "/User/login"
    When I enter "tarzan@gmail.com" in "email" and "1234" in "password" and click "Login!"
    Then I see "Incorrect email/password combination."