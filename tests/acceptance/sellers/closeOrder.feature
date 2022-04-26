Feature: close an order
    In order to terminate an order
    As a seller
    I need to be able to close the order 

    Scenario: try to put an end to an order that's been completed
    Given I am logged in with "candy@gmail.com" and "1234" and click "Order List" and see an order in progress
    When I click "Order is ready for pick-up" then I click "Order was picked-up"
    Then I see "Order History" and "Closed"