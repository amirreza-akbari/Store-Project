
cls
@ECHO OFF
title Folder Locker
if EXIST "Private" goto UNLOCK
if NOT EXIST Locker goto MDLOCKER
:CONFIRM
echo رمز رو وارد کن برای قفل کردن فولدر:
set /p "pass=>"
if "%pass%"=="1234" goto LOCK
echo رمز اشتباهه
goto CONFIRM
:LOCK
ren Locker Private
attrib +h +s Private
echo فولدر قفل شد.
goto End
:UNLOCK
echo رمز رو وارد کن برای باز کردن فولدر:
set /p "pass=>"
if "%pass%"=="1234" goto UNLOCKFOLDER
echo رمز اشتباهه
goto END
:UNLOCKFOLDER
attrib -h -s Private
ren Private Locker
echo فولدر باز شد.
goto End
:MDLOCKER
md Locker
echo فولدر ساخته شد.
goto End
:End
