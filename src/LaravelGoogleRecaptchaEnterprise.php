<?php

namespace SpaanProductions\LaravelGoogleRecaptchaEnterprise;

use Exception;
use Illuminate\Support\HtmlString;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
use Google\Cloud\RecaptchaEnterprise\V1\CreateAssessmentRequest;
use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;
use Google\Cloud\RecaptchaEnterprise\V1\Client\RecaptchaEnterpriseServiceClient;
use SpaanProductions\LaravelGoogleRecaptchaEnterprise\Exceptions\RecaptchaEnterpriseException;

class LaravelGoogleRecaptchaEnterprise
{
    public function script(...$arguments): HtmlString
    {
        return new HtmlString(
            '<script src="https://www.google.com/recaptcha/enterprise.js?render='.config('google-recaptcha-enterprise.sitekey').'"></script>'.
            '<script> function onSubmit(token) { document.querySelector(".g-recaptcha").closest("form").submit(); } </script>'
        );
    }

    public function create_assessment(
        string $recaptchaKey,
        string $token,
        string $project,
        string $action
    ): float {
        $client = new RecaptchaEnterpriseServiceClient([
            'credentials' => config('google-recaptcha-enterprise.credentials'),
        ]);

        $projectName = $client->projectName($project);

        // Set the properties of the event to be tracked.
        $event = (new Event())
            ->setSiteKey($recaptchaKey)
            ->setToken($token);

        // Build the assessment request.
        $assessment = (new Assessment())
            ->setEvent($event);

        try {
            $response = $client->createAssessment(
                CreateAssessmentRequest::build($projectName, $assessment)
            );

            // Check if the token is valid.
            if ($response->getTokenProperties()->getValid() === false) {
                throw new RecaptchaEnterpriseException(
                    InvalidReason::name($response->getTokenProperties()->getInvalidReason())
                );

                // printf('The CreateAssessment() call failed because the token was invalid for the following reason: ');
                // printf(InvalidReason::name($response->getTokenProperties()->getInvalidReason()));
                // return;
            }

            // Check if the expected action was executed.
            if ($response->getTokenProperties()->getAction() === $action) {
                // Get the risk score and the reason(s).
                // For more information on interpreting the assessment, see:
                // https://cloud.google.com/recaptcha-enterprise/docs/interpret-assessment
                // printf('The score for the protection action is:');
                // printf($response->getRiskAnalysis()->getScore());

                return $response->getRiskAnalysis()->getScore();
            } else {
                throw new RecaptchaEnterpriseException(
                    sprintf('The action attribute in your reCAPTCHA tag [%s] does not match the action you are expecting to score.', $response->getTokenProperties()->getAction())
                );
            }
        } catch (Exception $e) {
            // printf('CreateAssessment() call failed with the following error: ');
            throw new RecaptchaEnterpriseException($e->getMessage(), previous: $e);
        }
    }
}
