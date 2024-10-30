#!/bin/bash

# Check for any changes
if [[ -n $(git status -s) ]]; then
    echo "Changes detected. The following files have been modified or added:"
    
    # Show the changed files
    git status -s

    # Ask for confirmation to proceed
    read -p "Do you want to add and commit these changes? (y/n): " confirm

    if [[ "$confirm" == "y" || "$confirm" == "Y" ]]; then
        echo "Adding and committing changes..."

        # Add all changes, including untracked files
        git add -A

        # Commit changes with a default message or use a message passed as an argument
        COMMIT_MESSAGE="${1:-'Update from script'}"
        git commit -m "$COMMIT_MESSAGE"

        # Push changes to the remote repository
        git push origin master

        echo "Changes pushed successfully."
    else
        echo "Changes not committed."
    fi
else
    echo "No changes to commit."
fi
