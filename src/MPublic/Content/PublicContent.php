<?php
namespace Mints\MPublic\Content;

trait PublicContent
{
    use PublicAssets,
        PublicContentBundles,
        PublicContentInstances,
        PublicContentInstanceVersions,
        PublicForms,
        PublicStories,
        PublicStoryVersions;
}