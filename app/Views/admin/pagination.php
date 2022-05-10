<?php $pager->setSurroundCount(2) ?>

<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    <span class="flex items-center col-span-3">
        Showing 21-30 of 100
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Page navigation">
            <ul class="inline-flex items-center">
                <?php if ($pager->hasPrevious()) : ?>
                    <li>
                        <a class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                            <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                            <!-- <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg> -->
                        </a>
                    </li>
                    <li>
                        <a class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                            <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                            <!-- <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg> -->
                        </a>
                    </li>
                <?php endif ?>

                <?php foreach ($pager->links() as $link) : ?>
                    <li <?= $link['active'] ? 'class=" py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"' : '' ?>>
                        <a class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" href="<?= $link['uri'] ?>">
                            <?= $link['title'] ?>
                        </a>
                    </li>
                <?php endforeach ?>

                <?php if ($pager->hasNext()) : ?>
                    <li>
                        <a class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                            <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                            <!-- <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg> -->
                        </a>
                    </li>
                    <li>
                        <a class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                            <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                            <!-- <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg> -->
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </span>
</div>