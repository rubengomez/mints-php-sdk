<?php

namespace Mints\User\Config;

trait Config
{
    use ApiKeys,
        Appointments,
        AttributeGroups,
        Attributes,
        Calendars,
        Exports,
        ExportConfiguration,
        PublicFolders,
        Relationships,
        Roles,
        Seeds,
        SystemSettings,
        Tags,
        Taxonomies,
        Teams,
        Users;
}