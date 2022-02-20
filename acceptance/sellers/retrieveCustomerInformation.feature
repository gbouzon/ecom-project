Feature: retrieve a customer's information
    In order to retrieve customer's information
    As a seller
    I need to be able to get the customer information

    Scenario: try to get the customer name
    Given I am logged in to my account and have the customer id
    When I click on "view more detail"
    Then I see "The customer information"
