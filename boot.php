<?php

# Seriously, why do you even think this could be a good idea and a solution to your problem?

/* This was an April Fool's Joke and will stay here to remind you that not every problem comes from the REDAXO Cache even if you think so.
if (time() > rex_config::get('uncache', 'next')) {
    rex_delete_cache();
    rex_config::set('uncache', 'next', time() + rex_config::get('uncache', 'seconds'));
}
*/
