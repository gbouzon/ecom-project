Feature: track my order status
    In order to be updated about my order
    As a buyer
    I need to be able to track my order status

    Scenario: try viewing order status 
    Given I am logged into my account and have placed an order
    When I click on "View Order Status"
    Then I see a status bar with the corresponding status