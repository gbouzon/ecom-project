Feature: confirm an order
    In order to fulfill an order
    As a seller
    I need to be able to confirm the order 

    Scenario: try to accept an order
    Given I am logged in with "candy@gmail.com" and "1234" and click "Order List" and see a pending order
    When I click "Accept order"
    Then I see "Order is ready for pick-up"
