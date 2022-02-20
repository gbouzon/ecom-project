Feature: search for a specific customer
    In order to look for a specific customer
    As a seller
    I need to be able to retrieve the specific customer

    Scenario: try to search for a specific customer
    Given I am logged into my account and search for the customer 
    When I click "search"
    Then I see "the specific customer information"