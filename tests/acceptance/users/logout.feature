Feature: logout
    In order to prevent other users from accessing my account
    As a user
    I need to be able to logout

    Scenario: try logging out
    Given I am logged in with "tester@gmail.com" and "1234"
    When I click "Log out"
    Then I am redirected to "/Main/index"