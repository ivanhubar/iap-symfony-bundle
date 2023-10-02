<?php

namespace IvanHubar\HubarIAPBundle\Enum;

enum ParameterEnum: string
{
    case APPLE_PASSWORD = "apple_password";
    case PATH_TO_APPLE_ROOT_CERTIFICATE = "path_to_apple_root_certificate";
    case APPLE_PRIVATE_KEY_ID = "apple_private_key_id";
    case APPLE_ISSUER_ID = "apple_issuer_id";
    case APPLE_BUNDLE_ID = "apple_bundle_id";
    case APPLE_PRIVATE_KEY = "apple_private_key";
    case GOOGLE_CREDENTIALS_PATH = "google_credentials_path";
    case GOOGLE_PACKAGE_NAME = "google_package_name";
}
