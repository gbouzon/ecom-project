Feature: cancel an order
    In order to change my mind about my order
    As a buyer
    I need to be able to cancel my order

    Scenario: try cancelling an order while it's pending
    Given I am logged in with "tester@gmail.com" and "1234" and have placed an order and click "History"
    When I click "Cancel order"
    Then I see "You have no orders"