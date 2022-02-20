Feature: confirm an order
    In order to approve an order
    As a seller
    I need to be able to confirm the order 

    Scenario: try to accepted an order
    Given I am logged into my account
    When I click on "confirm order"
    Then I see "Order Accepted"
