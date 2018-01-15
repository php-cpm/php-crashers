<?php
/* Backtracking stack overflow in regular expresssion.
 *
 * Whether this crashes depends on several circumstances, including the version, configuration
 * and whether libpcre was compiled with jit support.
 *
 * This has been reported to PHP multiple times (all closed as "Not a bug"):
 * - https://bugs.php.net/bug.php?id=45735 (this has the most detailed explanation)
 * - https://bugs.php.net/bug.php?id=61744
 * - https://bugs.php.net/bug.php?id=71720
 *
 * As a summary, pcre matches every item into `$0`,if count reach the limit `pcre.backtrack_limit`
 * you may got the `Segfault` which stop the whole process.
 */

preg_match("/(0)*/", str_repeat("0", 15000));
