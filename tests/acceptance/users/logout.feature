Feature: logout
    In order to prevent other users from accessing my account
    As a user
    I need to be able to logout

    Scenario: try logging out
    Given I am logged in
    When I click on "Log Out"
    Then I see "You have successfully logged out" and the main page