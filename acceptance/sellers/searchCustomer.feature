Feature: search for a specific customer
    In order to find a specific customer
    As a seller
    I need to be able to search for customers

    Scenario: try to search for a specific customer
    Given I am logged into my account and enter the customer information on the search bar
    When I click "Search"
    Then I see "the specific customer information"