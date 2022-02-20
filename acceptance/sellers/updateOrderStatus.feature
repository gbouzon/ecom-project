Feature: update order status
    In order to update order status
    As a seller
    I need to be able to update the status

    Scenario: try to update a order status
    Given I am logged into my account and the status need to be change
    When I click on "change"
    Then I see "Status updated" 
