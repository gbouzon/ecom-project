Feature: access previous orders
    In order to view previous orders
    As a user 
    I need to be able to access my order record

    Scenario: try viewing a past order
    Given I am logged in to my account
    When I click on "View Past Orders"
    Then I see a list of orders I have previously placed

    Scenario: try viewing a past order
    Given I am not logged in
    When I click on "View Past Orders"
    Then I see "Please log in before continuing"