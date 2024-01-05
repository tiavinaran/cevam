<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'cevam' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']Cb&u?-m)[~d6-{:)+#.@j6{i4Q(UTVdKsT:tSULSVpW+i<=Z2m$Wnn|o*(cpNxY' );
define( 'SECURE_AUTH_KEY',  'W{+E*!aST&C1b8WGG<n0,O,pn@%}%Gu~JGG#Qt&yDm{P=oUk|BW_8jDDmFL]VDr5' );
define( 'LOGGED_IN_KEY',    '7 #( T99k:V4CT.]d*t}VeNo^q3#z)[Q/?to}JCMoiZw9W*X@;ta,p E2%)6BnD7' );
define( 'NONCE_KEY',        'vP;89Nl(/pdeEK~Lio-$]%R~8`TmM}6(;p69HG)*rIN=H2yFJl8Vw4a9OK.8N-^I' );
define( 'AUTH_SALT',        '(8r!He+3Uycc$n{4)2jvQrd*?6Y9A.4;_#/GW?6ydt6W</Ymm?_i>jIzDo<DG7@Y' );
define( 'SECURE_AUTH_SALT', 'P5X6j^)G:-r^eL{Tr2u5ySlP,ZQzA7@Qm[{~32_)-*z|.>blG]rgW8aYag!|z3h|' );
define( 'LOGGED_IN_SALT',   'DrW#o2V[i(zsj)@D*cD9-iX% vD&rZTP_V *^ibx<>mje*F@~Y:^2e+C{fl-raln' );
define( 'NONCE_SALT',       'sb0:BYA%JNq9i8y[jq$j?fRWZn$sw/h?q4)jc3-$Pghp*,<[9v_S;=2F}c1P?/z=' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
