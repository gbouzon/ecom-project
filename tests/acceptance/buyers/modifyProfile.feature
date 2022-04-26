Feature: modify my profile
    In order to update my information
    As a buyer
    I need to be able to modify my profile

Scenario: try modifying my last name
    Given I am logged in with "test2@gmail.com" and "1234" and click "Update"
    When I enter "Hat" in "last_name" and click "Update!"
    Then I see "Test Hat"