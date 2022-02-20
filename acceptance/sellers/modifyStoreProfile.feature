Feature: modify my store profile
    In order to update my store information
    As a seller
    I need to be able to modify my store profile

    Scenario: try modifying store name
    Given I am logged into my account and change the store name
    When I click on "save"
    Then I see "profile is updated" 
