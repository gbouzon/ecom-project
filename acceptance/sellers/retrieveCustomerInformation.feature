Feature: retrieve a customer's information
    In order to contact a customer
    As a seller
    I need to be able to get the customer information

    Scenario: try to get the customer name
    Given I am logged in to my account and have the customer id
    When I click on "View more details"
    Then I see the customer's "name"
