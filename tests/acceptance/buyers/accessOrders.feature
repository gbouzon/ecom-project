Feature: access previous orders
    In order to view previous orders
    As a buyer
    I need to be able to access my order record

    Scenario: try viewing a past order
    Given I am logged in with "test2@gmail.com" and "1234"
    When I click "Order History"
    Then I see "Order at:"