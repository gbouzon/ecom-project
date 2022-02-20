Feature: confirm an order
    In order to fulfill an order
    As a seller
    I need to be able to confirm the order 

    Scenario: try to accept an order
    Given I am logged into my account
    When I click on "Confirm order"
    Then I see "Order Accepted"
