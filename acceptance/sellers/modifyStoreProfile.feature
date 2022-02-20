Feature: modify my store profile
    In order to properly manage my store
    As a seller
    I need to be able to modify my store profile

    Scenario: try modifying store name
    Given I am logged into my account and change the store name
    When I click on "Save"
    Then I see "Profile is updated" 
