Feature: retrieve an order
    In order to retrieve order information
    As a seller
    I need to be able to get the order information

    Scenario: try to retrieve order information
    Given I am logged in with "candy@gmail.com" and "1234" and click "Order List"
    When I click "Detail"
    Then I see "Order Detail" and "Purchased Items"