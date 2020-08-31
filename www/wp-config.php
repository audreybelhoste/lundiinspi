<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'lundiinspi' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wordpress' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wp_root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '8KGkRr#ToH+tqI?|c++DbmXdT}y.bg!tV1Ge^<wDkYl?]ZDs({sSiKC>r<AU-yM2' );
define( 'SECURE_AUTH_KEY',  '4L|rL<Dt-iy?O1DklaeU=gm+%Sddv%F9Tok{>.7^(C8il(H(11/xOM=e:N*1[LWV' );
define( 'LOGGED_IN_KEY',    'R!]_e!c5@K_ueg~WGWEf3hFF@3VvW, >n_!W7=5rn.WQ: `h1iYRP2|UdzgdU3|7' );
define( 'NONCE_KEY',        'Ig wG<L-549AXYz8yUX}MUwC/epe:*]B8)C$1R;brJc+,(soaURvgKomNn`E,ny ' );
define( 'AUTH_SALT',        ')mW,Ih%H.6:mrbckL]RV3^+gb<D6fd*vGi?OXk,ZQ=rPi]seo%Z;(Bk!.=r.%,O/' );
define( 'SECURE_AUTH_SALT', 'skR %C9Rz;XWx*mZvQf#Ub&:-L=[l$6gD9T^MR3xkQiA||7*48EE/T6 WIQev^mt' );
define( 'LOGGED_IN_SALT',   'T#]]EC~%Z-m=QkN~i8o`Cojz C;S-g`{el/o?GAgHdHKimJ)slV_!A(.0Hmy[CY*' );
define( 'NONCE_SALT',       'Eh$H[( QD5).<T}-_ZB$#}zy>oz,2{_1qE!CYFV..n X`,9}.I5{$$OBWqJUr|x=' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wpli_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
