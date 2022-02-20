Feature: update order status
    In order to keep customer apprised of their order situation
    As a seller
    I need to be able to update the order status

    Scenario: try to update an order status
    Given I am logged into my account and the status needs to be changed
    When I click on "Update" and choose the proper 
    Then I see "Status updated" 
