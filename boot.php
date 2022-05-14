<?php

# Seriously, why do you even think this could be a good idea and a solution to your problem?

if (time() > rex_config::get('uncache, next')) {
    rex_delete_cache();
    rex_config::set('uncache', 'next', time() + rex_config::get('uncache', 'seconds'));
}
