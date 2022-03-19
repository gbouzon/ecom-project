Feature: cancel an order
    In order to change my mind about my order
    As a buyer
    I need to be able to cancel my order

    Scenario: try cancelling an order before it's in progress
    Given I am logged into my account and have placed an order
    When I click on "Cancel Order"
    Then I see "Order successfully canceled"

    Scenario: try cancelling an order that is "in progress"
    Given I am logged into my account and have placed an order
    When I click on "Cancel Order"
    Then I see "Order is already in progress. Cancellations are no longer accepted"

    Scenario: try cancelling an order that has been completed
    Given I am logged into my account and have placed an order
    When I click on "Cancel Order"
    Then I see "Not possible to canceled fulfiled orders."