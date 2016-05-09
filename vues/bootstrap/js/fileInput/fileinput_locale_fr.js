/*!
 * FileInput French Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['fr'] = {
        fileSingle: 'fichier',
        filePlural: 'fichiers',
        browseLabel: 'Parcourir&hellip;',
        removeLabel: 'Retirer',
        removeTitle: 'Retirer les fichiers sÃ©lectionnÃ©s',
        cancelLabel: 'Annuler',
        cancelTitle: "Annuler l'envoi en cours",
        uploadLabel: 'TransfÃ©rer',
        uploadTitle: 'TransfÃ©rer les fichiers sÃ©lectionnÃ©s',
        msgNo: 'Non',
        msgCancelled: 'AnnulÃ©',
        msgZoomTitle: 'Voir les dÃ©tails',
        msgZoomModalHeading: 'AperÃ§u dÃ©taillÃ©',
        msgSizeTooLarge: 'Le fichier "{name}" (<b>{size} Ko</b>) dÃ©passe la taille maximale autorisÃ©e qui est de <b>{maxSize} Ko</b>.',
        msgFilesTooLess: 'Vous devez sÃ©lectionner au moins <b>{n}</b> {files} Ã  transmettre.',
        msgFilesTooMany: 'Le nombre de fichier sÃ©lectionnÃ© <b>({n})</b> dÃ©passe la quantitÃ© maximale autorisÃ©e qui est de <b>{m}</b>.',
        msgFileNotFound: 'Le fichier "{name}" est introuvable !',
        msgFileSecured: "Des restrictions de sÃ©curitÃ© vous empÃªchent d'accÃ©der au fichier \"{name}\".",
        msgFileNotReadable: 'Le fichier "{name}" est illisble.',
        msgFilePreviewAborted: 'PrÃ©visualisation du fichier "{name}" annulÃ©e.',
        msgFilePreviewError: 'Une erreur est survenue lors de la lecture du fichier "{name}".',
        msgInvalidFileType: 'Type de document invalide pour "{name}". Seulement les documents de type "{types}" sont autorisÃ©s.',
        msgInvalidFileExtension: 'Extension invalide pour le fichier "{name}". Seules les extensions "{extensions}" sont autorisÃ©es.',
        msgUploadAborted: 'Le tÃ©lÃ©chargement du fichier a Ã©tÃ© interrompu',
        msgValidationError: 'Erreur de validation',
        msgLoading: 'Transmission du fichier {index} sur {files}&hellip;',
        msgProgress: 'Transmission du fichier {index} sur {files} - {name} - {percent}% faits.',
        msgSelected: '{n} {files} sÃ©lectionnÃ©(s)',
        msgFoldersNotAllowed: 'Glissez et dÃ©posez uniquement des fichiers ! {n} rÃ©pertoire(s) exclu(s).',
        msgImageWidthSmall: 'Largeur de fichier image "{name}" doit Ãªtre d\'au moins {size} px.',
        msgImageHeightSmall: 'Hauteur de fichier image "{name}" doit Ãªtre d\'au moins {size} px.',
        msgImageWidthLarge: 'Largeur de fichier image "{name}" ne peut pas dÃ©passer {size} px.',
        msgImageHeightLarge: 'Hauteur de fichier image "{name}" ne peut pas dÃ©passer {size} px.',
        msgImageResizeError: "Impossible d'obtenir les dimensions de l'image Ã  redimensionner.",
        msgImageResizeException: "Erreur lors du redimensionnement de l'image.<pre>{errors}</pre>",
        dropZoneTitle: 'Glissez et dÃ©posez les fichiers ici&hellip;',
        fileActionSettings: {
            removeTitle: 'Supprimer le fichier',
            uploadTitle: 'TÃ©lÃ©charger un fichier',
            indicatorNewTitle: 'Pas encore tÃ©lÃ©chargÃ©',
            indicatorSuccessTitle: 'PostÃ©',
            indicatorErrorTitle: 'Ajouter erreur',
            indicatorLoadingTitle: 'ajout ...'
        }
    };
})(window.jQuery);