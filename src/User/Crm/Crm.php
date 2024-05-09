<?php
namespace Mints\User\Crm;

trait CRM
{
    use Companies,
        Contacts,
        Deals,
        Favorites,
        Segments,
        Users,
        Workflows,
        WorkflowStepObjects,
        WorkFlowSteps;
}