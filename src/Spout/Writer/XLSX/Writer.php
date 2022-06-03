<?php

namespace Box\Spout\Writer\XLSX;

use Box\Spout\Writer\Common\Entity\Options;
use Box\Spout\Writer\WriterMultiSheetsAbstract;

/**
 * Class Writer
 * This class provides base support to write data to XLSX files
 */
class Writer extends WriterMultiSheetsAbstract
{
    /** @var string Content-Type value for the header */
    protected static $headerContentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

<<<<<<< HEAD
    /** @var string Temporary folder where the files to create the XLSX will be stored */
    protected $tempFolder;

    /** @var bool Whether inline or shared strings should be used - inline string is more memory efficient */
    protected $shouldUseInlineStrings = true;

    /** @var Internal\Workbook The workbook for the XLSX file */
    protected $book;

    protected $additionalSettings = [];

=======
>>>>>>> 84596668410bea89d21aa9867b91e1550e359329
    /**
     * Sets a custom temporary folder for creating intermediate files/folders.
     * This must be set before opening the writer.
     *
     * @param string $tempFolder Temporary folder where the files to create the XLSX will be stored
     * @throws \Box\Spout\Writer\Exception\WriterAlreadyOpenedException If the writer was already opened
     * @return Writer
     */
    public function setTempFolder($tempFolder)
    {
        $this->throwIfWriterAlreadyOpened('Writer must be configured before opening it.');

        $this->optionsManager->setOption(Options::TEMP_FOLDER, $tempFolder);

        return $this;
    }

    /**
     * Use inline string to be more memory efficient. If set to false, it will use shared strings.
     * This must be set before opening the writer.
     *
     * @param bool $shouldUseInlineStrings Whether inline or shared strings should be used
     * @throws \Box\Spout\Writer\Exception\WriterAlreadyOpenedException If the writer was already opened
     * @return Writer
     */
    public function setShouldUseInlineStrings($shouldUseInlineStrings)
    {
        $this->throwIfWriterAlreadyOpened('Writer must be configured before opening it.');

<<<<<<< HEAD
        $this->shouldUseInlineStrings = $shouldUseInlineStrings;
        return $this;
    }

    /**
     * Configures the write and sets the current sheet pointer to a new sheet.
     *
     * @return void
     * @throws \Box\Spout\Common\Exception\IOException If unable to open the file for writing
     */
    protected function openWriter()
    {
        if (!$this->book) {
            $tempFolder = ($this->tempFolder) ? : sys_get_temp_dir();
            $this->book = new Workbook($tempFolder, $this->shouldUseInlineStrings, $this->shouldCreateNewSheetsAutomatically, $this->defaultRowStyle, $this->additionalSettings);
            $this->book->addNewSheetAndMakeItCurrent();
        }
    }
=======
        $this->optionsManager->setOption(Options::SHOULD_USE_INLINE_STRINGS, $shouldUseInlineStrings);
>>>>>>> 84596668410bea89d21aa9867b91e1550e359329

        return $this;
    }

    public function setAdditionalSettings(array $data)
    {
        $this->additionalSettings = $data;
    }
}
