Feature: track my order status
    In order to be updated about my order
    As a buyer
    I need to be able to track my order status

    Scenario: try viewing order status 
    Given I am logged in with "test2@gmail.com" and "1234"
    When I click "Order History"
    Then I see "Pending Order..."