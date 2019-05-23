@managing_administrators
Feature: Seeing where from any administrators has been logging in recently
    In order to see administrators with information about their activity
    As an Administrator
    I want to know where from any admins has been logging in recently

    Background:
        Given there is an administrator "mr.potato@example.com" with "127.0.0.2" address
        And there is also an administrator "ted@example.com" with "127.0.0.3" address
        And I am logged in as "mr.potato@example.com" administrator

    @ui
    Scenario: Seeing where from any administrators has been logging in recently
        When I want to browse administrators
        Then I should see that the administrator "mr.potato@example.com" has "127.0.02" address
        And I should see that the administrator "ted@example.com" has "127.0.0.3" address
