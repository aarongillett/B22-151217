<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ultetriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'b22it');

/** Nome utente del database MySQL */
define('DB_USER', 'b22it');

/** Password del database MySQL */
define('DB_PASSWORD', 'N6DDsmVeoXFaT!');

/** Hostname MySQL  */
define('DB_HOST', 'b22it.db.7460362.hostedresource.com');

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8mb4');

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[lrAb-u?pIx6`5Nc@f+4*aEWn6IG*s^_[}U![i;_v48mM0LH0aodZ*}Y~7$wF$_b');
define('SECURE_AUTH_KEY',  'u;I&O?`mN8FX2mlNl`-<;Mycs+Fz-xnchp{ZR!lJot4$R`CnX8pU[my|a`t|c|Du');
define('LOGGED_IN_KEY',    'mBon5+] MNay9-`FNANcH07BH?`gX}p;|F]S2~w7*okKSKj(UvPPFq,v/nkegYWw');
define('NONCE_KEY',        'm[,$J;F>+>E^6:.p[rw|>$$YI.-f;0)v[nl3B|Pj:wuD0-0~Z=@a@]<r~CVnhiQ~');
define('AUTH_SALT',        'V0z1C(3Ela<a|Tf9j(#-|p2Vfc*)7 X9o+q-LQ;csp#8#B|w,nN}fIYu~)G*S.I-');
define('SECURE_AUTH_SALT', ';>i/rB@cm-Dq`(llYamaSw(EE(- K~G<,T3>A]2nLEia~Lf_Gm@YL8OVkZ-Y-.(o');
define('LOGGED_IN_SALT',   '&%UmR9&7*6e8~CwNlbX|<^8O=Q-*BgV7`.Wg|3P7>R.|b|En]4yWFS-6CVu>D%n@');
define('NONCE_SALT',       '(q~k8/l(DtjKqz<It/|%|DZh[6-QVyJ^KNoQw<w/5En+rt e/bAB|A6MYd%Y+P:;');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');