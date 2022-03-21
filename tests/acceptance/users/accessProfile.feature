Feature: access my profile
    In order to modify my profile information
    As a user 
    I need to be able to access my profile

    Scenario: try modifying my first name
    Given I am logged in with "test@gmail.com" and "1234" and click "Update"
    When I enter "Test" in "first_name" and click "Update!"
    Then I see "Test Bouzon"