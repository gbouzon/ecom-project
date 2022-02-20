Feature: cancel an order
    In order to cancel an order
    As a seller
    I need to be able to cancel the order 

    Scenario:  try cancelling an order before accepted it 
    Given I am logged into my account 
    When I click on "Cancel Order"
    Then I see "Order successfully canceled"

    Scenario: try cancelling an order after accepted it 
    Given I am logged into my account
    When I click on "Cancel Order"
    Then I see "Order is already in progress. Cancellations are no longer accepted"