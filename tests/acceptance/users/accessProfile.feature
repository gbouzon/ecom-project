Feature: access my profile
    In order to modify my profile information
    As a user 
    I need to be able to access my profile

    Scenario: try modifying my first name
    Given I am logged in to my account
    When I click on "Save" after modifying my first name
    Then I see "Profile successfully modified!"