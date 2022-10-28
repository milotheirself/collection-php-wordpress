import appPaths from 'https://github.com/wesauis/deno-app-paths/raw/0.1.1/mod.ts';

import { resolve } from 'https://deno.land/std@0.155.0/node/path.ts';
import { copy } from 'https://deno.land/std@0.155.0/fs/mod.ts';

await Promise.all([
  ...['my-plugin'].map(async (pat) => {
    const tmp = resolve(`./${pat}`);
    const out = resolve(`C:/Application/xampp/htdocs/wp-content/plugins/${pat}`);

    await copy(tmp, out, { overwrite: true });
  }),
  ...['my-themes'].map(async (pat) => {
    const tmp = resolve(`./${pat}`);
    const out = resolve(`C:/Application/xampp/htdocs/wp-content/themes/${pat}`);

    await copy(tmp, out, { overwrite: true });
  }),
]);
