@managing_administrators
Feature: Seeing where from any administrator has been logging in recently
    In order to see administrators with information about their activity
    As an Administrator
    I want to know where from any administrator has been logging in recently

    Background:
        Given there is an administrator "mr.potato@example.com" that recently logged in using "127.0.0.2" IP address
        And there is also an administrator "ted@example.com" that recently logged in using "127.0.0.3" IP address
        And I am logged in as "mr.potato@example.com" administrator

    @ui
    Scenario: Seeing where from any administrators has been logging in recently
        When I browse administrators
        Then I should see that the administrator "mr.potato@example.com" has recently logged in using "127.0.0.2" address
        And I should see that the administrator "ted@example.com" has recently logged in using "127.0.0.3" address
