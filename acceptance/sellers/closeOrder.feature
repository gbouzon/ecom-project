Feature: close an order
    In order to terminate an order
    As a seller
    I need to be able to close the order 

    Scenario: try to put an end to an order that's been completed
    Given I am logged into my account 
    When I click on "close order"
    Then I see "The order is closed"

    Scenario: try to put an end to an order that is "in progress"
    Given I am logged into my account 
    When I click on "Close order"
    Then I see "The order is already in progress. Are you sure you would like to cancel it?"